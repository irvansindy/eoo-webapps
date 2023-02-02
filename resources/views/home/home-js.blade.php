<script>
  
    function master_chart(title,labels,type,id,data_a){
        const data = {
            labels: labels,
            datasets: [{
            label: title,
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: data_a,
            }]
        }
        const config = {
            type:type,
            data: data,
            options: {}
        };
       
        var myChart = new Chart(
            id,
            config
        );
    }
    function master_speedometer(){
                    //Script Speedometer NPAT monthly
                        var opts = {
                            angle: 0.0, /// The span of the gauge arc
                            lineWidth: 0.64, // The line thickness
                            pointer: {
                                length: 0.6, // Relative to gauge radius
                                strokeWidth: 0.035 // The thickness,
                            },
                                colorStart: '#dc474f',   // Colors
                                colorStop: '#dc474f',    // just experiment with them
                                strokeColor: '#E0E0E0',   // to see which ones work best for you
                                generateGradient: true,
                                highDpiSupport: true,
                                staticLabels: {
                                    font: "12px sans-serif",  // Specifies font
                                    labels: [0,100],  // Print labels at these values
                                    color: "#000000",  // Optional: Label text color
                                    fractionDigits: 0, // Optional: Numerical precision. 0=round off.
                                }
                        };
                        $("#gaugNpat-value").remove();
                        $("#label_gaugNpat").remove();
                        $("#gaugNpat-value_container").prepend('<p id="label_gaugNpat" style="font-size:12px;margin-right:30px;text-align:center;"><output  id="gaugNpat-value"></output>%<br>NPAT</p>'); 
                        $("canvas#gaugNpat").remove();
                        $("#gaugNpat_container").append('<canvas id="gaugNpat" style="width: 80%;"></canvas>'); 
                        var target = document.getElementById('gaugNpat'); // your canvas element
                        var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
                        gauge.maxValue = 100; // set max gauge value
                        gauge.setMinValue(0);  // set min value
                        gauge.set(parseFloat(response.speedometer_npat_monthly[0])); // set actual value
                        gauge.setTextField(document.getElementById("gaugNpat-value"));
                        if(response.speedometer_npat_monthly[0]>=100)
                        {     
                            gauge.maxValue = 1000; // set max gauge value
                        }
                        if((response.speedometer_npat_monthly[0]==null)||(response.speedometer_npat_monthly[0]==0))
                        {
                        var opts = {
                            angle: 0.0, /// The span of the gauge arc
                            lineWidth: 0.64, // The line thickness
                            pointer: {
                                length: 0.6, // Relative to gauge radius
                                strokeWidth: 0.035 // The thickness,
                            },
                            colorStart: '#D33A27',   // Colors
                            colorStop: '#D33A27',    // just experiment with them
                            strokeColor: '#E0E0E0',   // to see which ones work best for you
                            generateGradient: true,
                            highDpiSupport: true,
                            staticLabels: {
                                font: "12px sans-serif",  // Specifies font
                                labels: [0,100],  // Print labels at these values
                                color: "#000000",  // Optional: Label text color
                                fractionDigits: 0, // Optional: Numerical precision. 0=round off.
                            }
                        };

                        var target = document.getElementById('gaugNpat'); // your canvas element
                        var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
                        gauge.maxValue = 100; // set max gauge value
                        gauge.setMinValue(0);  // set min value
                        gauge.set(0); // set actual value
                        gauge.setTextField(document.getElementById("gaugNpat-value"));
                    }
    }
   
</script>