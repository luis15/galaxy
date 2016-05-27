<!DOCTYPE html>
<meta charset="utf-8">
<style>

.node {
  stroke: #B0C4DE;
  stroke-width: 40px;
  stroke-opacity: .3;
}

.link {
  stroke: #999;
  stroke-opacity: .0;
}

</style>
<body bgcolor="#191970">
<?php include"contador.php";?>
<script src="//d3js.org/d3.v3.min.js"></script>
<script>

var width = 1024,
    height = 768;

var force = d3.layout.force()
    .charge(-200)
    .linkDistance(40)
    .size([width, height]);

var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height);

d3.json("miserables.json", function(error, graph) {
  if (error) throw error;

  force
      .nodes(graph.nodes)
      .links(graph.links)
      .start();

  var link = svg.selectAll(".link")
      .data(graph.links)
    .enter().append("line")
      .attr("class", "link")
      .style("stroke-width", function(d) { return Math.sqrt(d.value); });

  var node = svg.selectAll(".node")
      .data(graph.nodes)
    .enter().append("circle")
      .attr("class", "node")
      .attr("r", 10)
      .style("fill","#aabfff")
      .call(force.drag);

  node.append("title")
      .text(function(d) { return d.name; });

  force.on("tick", function() {
    link.attr("x1", function(d) { return d.source.x; })
        .attr("y1", function(d) { return d.source.y; })
        .attr("x2", function(d) { return d.target.x; })
        .attr("y2", function(d) { return d.target.y; });

    node.attr("cx", function(d) { return d.x; })
        .attr("cy", function(d) { return d.y; });
  });
});

</script>