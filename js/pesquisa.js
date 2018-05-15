function functionConcelho(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
  s2.options.length = 0;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if(this.readyState == XMLHttpRequest.DONE){
        console.log(this.responseText);
        var lines = this.responseText.split("\n");
        for (var i = -1; i < lines.length; i++) {
          var newOption = document.createElement("option");
          if (i==-1) {
              newOption.value = "Concelho";
              newOption.innerHTML = "Concelho";
              s2.options.add(newOption);
            }else{
              if (lines[i]!="") {
                var elem = lines[i].split(";");
                newOption.value = elem[1];
                newOption.innerHTML = elem[0];
                s2.options.add(newOption);
              }
            }
          }
        }

    };
    xmlhttp.open("GET", "data/pesquisa/concelho/"+s1.value+".csv", true);
    xmlhttp.send();


	}

  function functionFreguesia(s2,s3){
  	var s2 = document.getElementById(s2);
  	var s3 = document.getElementById(s3);
    s3.options.length = 0;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if(this.readyState == XMLHttpRequest.DONE){
          console.log(this.responseText);
          var lines = this.responseText.split("\n");
          for (var i = -1; i < lines.length; i++) {
            var newOption = document.createElement("option");
            if (i==-1) {
                newOption.value = "Freguesia";
                newOption.innerHTML = "Freguesia";
                s3.options.add(newOption);
              }else{
                if (lines[i]!="") {
                  var elem = lines[i].split(";");
                  newOption.value = elem[1];
                  newOption.innerHTML = elem[0];
                  s3.options.add(newOption);
                }
              }
          }
        }

      };
      xmlhttp.open("GET", "data/pesquisa/freguesia/"+s2.value+".csv", true);
      xmlhttp.send();

  	}

		function functionTipologia(s1,s2){
			var s1 = document.getElementById(s1);
			var s2 = document.getElementById(s2);
		  s2.options.length = 0;
		  if (s1.value=="terreno") {
				var newOption = document.createElement("option");
				newOption.value = "T0";
			  newOption.innerHTML = "T0";
	      s2.options.add(newOption);
		  }else{
				var newOptiont0 = document.createElement("option");
				newOptiont0.value = "T0";
				newOptiont0.innerHTML = "T0";
				s2.options.add(newOptiont0);
				var newOptiont1 = document.createElement("option");
				newOptiont1.value = "T1";
				newOptiont1.innerHTML = "T1";
				s2.options.add(newOptiont1);
				var newOptiont2 = document.createElement("option");
				newOptiont2.value = "T2";
				newOptiont2.innerHTML = "T2";
				s2.options.add(newOptiont2);
				var newOptiont3 = document.createElement("option");
				newOptiont3.value = "T3";
				newOptiont3.innerHTML = "T3";
				s2.options.add(newOptiont3);
				var newOptiont4 = document.createElement("option");
				newOptiont4.value = "T4";
				newOptiont4.innerHTML = "T4";
				s2.options.add(newOptiont4);
				var newOptiont5 = document.createElement("option");
				newOptiont5.value = "T5+";
				newOptiont5.innerHTML = "T5+";
				s2.options.add(newOptiont5);
			}
		}
