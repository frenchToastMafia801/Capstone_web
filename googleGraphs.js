/*readingCompArray or possibly a csv is the parameter for the reading comp scores */

        $(function (readingCompArray) {

          var readingCompTest = [null, null, null, null, 65, 69, 85, 90, 91, 95]; 

        $('#container4').highcharts({

        title: {

            text: 'Reading Comprehension',

            x: -20 //center

        },

        subtitle: {

            text: 'Source: Utah Schools',

            x: -20

        },

        xAxis: {

            categories: ['2nd Grade', '3rd Grade', '4th Grade', '5th Grade', '6th Grade',

                '7th Grade', '8th Grade', '9th Grade', '10th Grade', '11th Grade', '12th Grade']

        },

        yAxis: {

            title: {

                text: 'Reading Comprehension Score(0-100)'

            },

            plotLines: [{

                value: 0,

                width: 1,

                color: '#808080'

            }]

        },

        tooltip: {

            valueSuffix: '%'

        },

        legend: {

            layout: 'vertical',

            align: 'right',

            verticalAlign: 'middle',

            borderWidth: 0

        },

        series: [{

            name: 'High Range',

            data: [50, 59, 73, 76, 82, 84, 87, 89, 90, 93]

        }, {

            name: 'Student Score',

            data: readingCompTest

        }, {

            name: 'Low Range',

            data: [32, 42, 55, 55, 63, 66, 69, 71, 73, 74]

        }]

    });

});

       

        /*   These are the parameters for the students scores that will be

         * passed into the graphs (mathScore, scienceScore, artsScore)     */

        $(function  (studentGrade, mathScore, scienceScore, artsScore) {

        Highcharts.Renderer.prototype.symbols.line = function(x, y, width, height) {

    return ['M',x ,y + width / 2,'L',x+height,y + width / 2];

   

   /* var derivedArts = 1;

    artsScore = 425;

    studentGrade = 7

    if(studentGrade = 7) {

       

       switch (true) {

        case (artsScore < 404):

            derivedArts = 1;

            break;

         case (artsScore < 450):

            derivedArts = 2;

            break;

         case (artsScore < 514):

            derivedArts = 3;

            break;

         case (artsScore < 661):

            derivedArts = 4;

            break;

          default:

        alert("Unable to determine Languge Arts Score");

        break;

       };

    } else if(studentGrade = 8) {

       

       switch (true) {

        case (artsScore < 416):

            derivedArts = 1;

            break;

         case (artsScore < 471):

            derivedArts = 2;

            break;

         case (artsScore < 533):

            derivedArts = 3;

            break;

         case (artsScore < 681):

            derivedArts = 4;

            break;

          default:

        alert("Unable to determine Languge Arts Score");

        break;;  

       };               

    } else  if (studentGrade = 9) {

       

       switch (true) {

        case (artsScore < 430):

            derivedArts = 1;

            break;

         case (artsScore < 487):

            derivedArts = 2;

            break;

         case (artsScore < 559):

            derivedArts = 3;

            break;

         case (artsScore < 711):

            derivedArts = 4;

            break;

          default:

        alert("Unable to determine Languge Arts Score");

        break;;  

                    

            }   

        } else {

            alert ("Error with student grade retrieval")

        } */

    };

   

 

//-------------------------------------------------------

Highcharts.setOptions({

    chart:{

        type:'bar',

        margin:[5,15,10,100],

    },

    credits:{enabled:false},

    exporting:{enabled:false},

    legend:{enabled:false},

    title:{text:''},

    xAxis:{

        tickLength:0,

        lineColor:'#999',

        lineWidth:1,

        labels:{style:{fontWeight:'bold'}}       

    },

    yAxis:{

        min:0,

        minPadding:0,

        maxPadding:0,

        tickColor:'#ccc',

        tickWidth:1,

        tickLength:3,

        gridLineWidth:0,

        endOnTick:true,

        title:{text: ''},

        labels:{

            y:10,

            style:{

                fontSize:'8px'

            },

         /*   formatter:function(){

                if (this.isLast){

                    return this.value + "  ";

                }

                else{

                    return this.value;

                }

            } */

        } 

    },

    tooltip:{

        enabled:true,

        backgroundColor:'rgba(255, 255, 255, .85)',

        borderWidth:0,

        shadow:true,

        style:{fontSize:'10px',padding:2},

        formatter:function() {

           return this.series.name + ": <strong>" + Highcharts.numberFormat(this.y,2) + "</strong>";

        }

    },

    plotOptions:{

        bar:{

            color:'#000',

            shadow:false,

            borderWidth:0,

        },

        scatter:{

            marker:{

                symbol:'line',

                lineWidth:3,

                radius:8,

                lineColor:'#000'

            }

        }

    }

   

});

 

//-------------------------------------------------------

var chart1 = new Highcharts.Chart({

    chart:{renderTo:'container1'},

    xAxis:{categories:['Math']},

    yAxis:{

        min:1,

        max:5,
        

        labels:{y:0,style:{fontSize:'11px', fontWeight: 'bold'},   

            align: 'center',

                x: 50,

                y: 9,

            },      

        plotBands:[{from:1,to:2,color: 'rgba(5,5,5,.35)'},

                   {from:2,to:3,color: 'rgba(73,73,73,.35)'},

                   {from:3,to:4,color: 'rgba(145,145,145,.35)'},

                   {from:4,to:5,color: 'rgba(204,204,204,.35)'}]

    },

    /* mathScore is the variable for the students math score */

            series:[{name:'Scaled Score =' + mathScore,pointWidth:8,data:[3.25]},

            {name:'Target',type: 'scatter',data:[3.5],}

        ]

}, function (chart) { // on complete

 

        chart.renderer.rect(96, 20, 96, 20, 5)

            .attr({ 
                
                showToolTip: true,

                'stroke-width': 2,

                stroke: 'black',

                fill: 'transparent',

                zIndex: 3,

                align: 'left',

                x: 289,

                y: 20.6

            })

            .add();

   

 

    });

//-------------------------------------------------------

var chart2 = new Highcharts.Chart({

    chart:{renderTo:'container2'},

    xAxis:{categories:['Science']},

      yAxis:{

        min:1,

        max:5,

         labels:{y:0,style:{fontSize:'11px', fontWeight: 'bold'},   

            align: 'center',

                x: 50,

                y: 9,

            },        

        plotBands:[{from:1,to:2,color: 'rgba(5,5,5,.35)'},

                   {from:2,to:3,color: 'rgba(73,73,73,.35)'},

                   {from:3,to:4,color: 'rgba(145,145,145,.35)'},

                   {from:4,to:5,color: 'rgba(204,204,204,.35)'}]

    },

    /* scienceScore is the variable for the students science score */

    series:[{name:'Student Scaled Score' + '250',pointWidth:8,data:[3.75]},

             {name:'Target Range 3',type: 'scatter',data:[3.5],}

        ]

}, function (chart) { // on complete

 

        chart.renderer.rect(96, 20, 96, 20, 5)

            .attr({

                name: 'Target Range',

                'stroke-width': 2,

                stroke: 'black',

                fill: 'transparent',

                zIndex: 3,

                align: 'left',

                x: 289,

                y: 20.6

            })

            .add();

 

    });

 

//-------------------------------------------------------

var chart3 = new Highcharts.Chart({

    chart:{renderTo:'container3'},

    xAxis:{categories:['Language Arts']},

      yAxis:{

        min:1,

        max:5,

         labels:{y:0,style:{fontSize:'11px', fontWeight: 'bold'},   

            align: 'center',

                x: 50,

                y: 9,

            },       

        plotBands:[{from:1,to:2,color: 'rgba(5,5,5,.35)'},

                   {from:2,to:3,color: 'rgba(73,73,73,.35)'},

                   {from:3,to:4,color: 'rgba(145,145,145,.35)'},

                   {from:4,to:5,color: 'rgba(204,204,204,.35)'}]

    },

    /* artsScore is the variable for the students arts score */

    series:[{name:'Measure',pointWidth:8,data:[2.2]},

            {name:'Target',type:'scatter',data:[3.5],}]

},function (chart) { // on complete

 

        chart.renderer.rect(96, 20, 96, 20, 5)

            .attr({

                'stroke-width': 2,

                stroke: 'black',

                fill: 'transparent',

                zIndex: 3,

                align: 'left',

                x: 289,

                y: 20.8

            })

            .add();

 

    });

});