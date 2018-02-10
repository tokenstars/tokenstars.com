$('document').ready(function(){


function wrap(text) {
    text.each(function() {
        var text = d3.select(this);
        var words = text.text().split(/\s+/).reverse();
        var lineHeight = 24;
        var width = 140//parseFloat(text.attr('width'));
        var y = parseFloat(text.attr('y'));
        var x = text.attr('x');
        var anchor = text.attr('text-anchor');

        var tspan = text.text(null).append('tspan').attr('x', x).attr('y', y).attr('text-anchor', anchor);
        var lineNumber = 0;
        var line = [];
        var word = words.pop();

        while (word) {
            line.push(word);
            tspan.text(line.join(' '));

            if (tspan.node().getComputedTextLength() > width) {

                lineNumber += 1;
                line.pop();
                tspan.text(line.join(' '));
                line = [word];
                tspan = text.append('tspan').attr('x', x).attr('y', y + lineNumber * lineHeight).attr('anchor', anchor).text(word);
            }
            word = words.pop();
        }
    });
}

margin = {top: 100, right: 100, bottom: 100, left: 100};
var color = d3.scale.ordinal()
    .range(["#dfe911","#e6e6ea","#c4c4ce","#a7a7b7", "#A9A9AD", "#81A8A8F"]);



var chart = RadarChart.chart();
chart.config({
    containerClass: 'radar-chart',
    w: 300,
    h: 300,
    margin: margin,
    factor: 0.9,
    factorLegend: 1,
    levels: 5,
    maxValue: 5,
    minValue: 0,
    radians: 2 * Math.PI,
    color: (function() {}),
    axisLine: true,
    axisText: true,
    circles: true,
    radius: 6,
    color: color,
    open: false,
    axisJoin: function(d, i) {
        return d.className || i;
    },
    tooltipFormatValue: function(d) {
        return d;
    },
    tooltipFormatClass: function(d) {
        return d;
    },
    transitionDuration: 300
});

var svg = d3.select('.chart-container').append('svg')
    .attr('width', "450px")
    .attr('height', '300px');

svg.append('g').classed('focus', 1).datum(data).call(chart);
d3.select('g').style('transform', 'translate(17%, 0%)')
d3.selectAll('text').style('fill', 'darkgray')
d3.selectAll('polyline').style('stroke', 'none')
d3.selectAll('line').style('stroke', 'none')
d3.selectAll('.radar-chart-serie0').style('stroke', 'black')
d3.selectAll('circle').style('stroke', '#cd6d82')
d3.selectAll('circle').style('stroke-width', '3px')
d3.selectAll('circle').style('fill', 'white')
d3.selectAll('polyline').on('mouseover',function(){
    return false
})
d3.selectAll('polyline').on('mouseout',function(){
    return false
})

d3.selectAll('polygon').on('mouseover',function(){
    return false
})
d3.selectAll('polygon').on('mouseout',function(){
    return false
})

var texts = d3.selectAll('text')[0];
var left = 1;
var right = 1;
var middle = 1;
for(var i = 0; i < texts.length; i++)
{
    switch (texts[i].className.baseVal)
    {
        case 'legend left':
            if(left == 1) {
                texts[i].setAttribute('x', -15)
            }
            else if(left == 2)
            {
                texts[i].setAttribute('x', -75)
                texts[i].setAttribute('y', 146)
            }
            else if(left == 3)
            {
                texts[i].setAttribute('x', -40)
                texts[i].setAttribute('y', 250)
            }
            left++
            break;
        case 'legend right':
            if(right == 1) {

                texts[i].setAttribute('x', 335)
                texts[i].setAttribute('y', 254)
            }
            else if(right == 2)
            {
                texts[i].setAttribute('x', 360)
            }
            else if(right == 3)
            {
                texts[i].setAttribute('x', 347)
            }
            right++
            break;
        case 'legend middle':
            if(middle == 1) {
                texts[i].setAttribute('y', -3)
            }
            else if(middle == 2)
            {
                texts[i].setAttribute('y', 300)
            }
            middle++
            break;
    }
}

    d3.selectAll('.legend').call(wrap);

$('.nav-pills a').on('click', function(){
    setTimeout(function(){
        d3.selectAll('.legend').call(wrap);
    }, 100)

})
})