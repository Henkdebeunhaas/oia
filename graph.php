
<!-- didnt completely write it myself, did make sort of an API cause its easier that way with D3.js -->
<!DOCTYPE html>
    <style>
        .bar 
        { 
            fill: #69ffb4; 
        }

        html
        {
            background-color: #485460;
        }
    </style>
    <body>
        <?php
            include("config.php");
            include("func.php");
            session_start();
            if ($_SESSION['role'] != 2) rr();
        ?>
        <!-- load the d3.js library -->    	
        <script src="https://d3js.org/d3.v7.min.js"></script>
        <script>
        var width = visualViewport.width * .9;// / 3;
        var height = visualViewport.height * .9;
        // set the dimensions and margins of the graph
        var margin = {top: 20, right: 20, bottom: 30, left: 40},
            width = width - margin.left - margin.right,
            height = height - margin.top - margin.bottom;

        // set the ranges
        var x = d3.scaleBand()
                .range([0, width])
                .padding(0.1);
        var y = d3.scaleLinear()
                .range([height, 0]);
                
        // append the svg object to the body of the page
        // append a 'group' element to 'svg'
        // moves the 'group' element to the top left margin
        var svg = d3.select("body").append("svg")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
        .append("g")
            .attr("transform", 
                "translate(" + margin.left + "," + margin.top + ")");

        // get the data
        d3.json("dataGather.php").then(function(data) {
            console.log(data);

        // format the data
        data.forEach(function(d) {
            d.stock = +d.stockLevel;
            d.product = d.prod_name;
        });

        // Scale the range of the data in the domains
        x.domain(data.map(function(d) { return d.product; }));
        y.domain([0, d3.max(data, function(d) { return d.stock; })]);

        // append the rectangles for the bar chart
        svg.selectAll(".bar")
            .data(data)
            .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return x(d.product); })
            .attr("width", x.bandwidth())
            .attr("y", function(d) { return y(d.stock); })
            .attr("height", function(d) { return height - y(d.stock); });

        // add the x Axis
        svg.append("g")
            .attr("transform", "translate(0," + height + ")")
            .call(d3.axisBottom(x));

        // add the y Axis
        svg.append("g")
            .call(d3.axisLeft(y));

        });
        </script>
    </body>
</html>