
<head>
<script type="text/javascript">

var $ = function(x){
	return document.getElementById(x);
}

var createXMLHttp = function(){
  //job of this function is to create an XMLHttpRequest object
  if(window.XMLHttpRequest){
      xHttp = new XMLHttpRequest();
  }else{
      xHttp = new ActiveXObject("Microsoft/XMLHttp");
  } 
  return xHttp;
} 


var searchHandle = function(){
  var xHttp = createXMLHttp();
  var sTerm = $("sTerm").value;
  var sCat = $("sCat").value;
  var url = "searchWS.php?sTerm="+sTerm+"&sCat="+sCat;
  //open the connection to your webservice -- url
  //1st parameter method: get or post; 2nd parameter web service name; 3rd parameter (optional) is True for asynchronous & False for Synchronous request
  
  xHttp.open("GET",url);
  //in case the method is post, then instead of appending variables to webservice url, paste variables and value inside send parenthesis
  xHttp.send();
  xHttp.onreadystatechange = function(){
    if(xHttp.readyState ==4){
       //JSON.parse will change the response from JSON to array
       var rows = JSON.parse(xHttp.responseText); //get your search results .responsText returns all results.
       //alert(rows[0]["id"]);
	   for(i=0; i<rows.length;i++){
		   var id = rows[i]["id"];
		   var name = rows[i]["name"];
		   var price = rows[i]["price"];
		   
		   	var tr = document.createElement("tr");
			var tdid = document.createElement("td");
			tdid.innerHTML = id;
			tr.appendChild(tdid);
			var tdname = document.createElement("td");
			tdname.innerHTML = name;
			tr.appendChild(tdname);
			var tdprice = document.createElement("td");
			tdprice.innerHTML = price;
			tr.appendChild(tdprice);
			$("tbodyId").appendChild(tr);
		
	   }
    }
  }
}


window.onload=function(){
  $("sTerm").onkeyup=searchHandle;
}

</script>
</head>
<body>
<form method="get" action="">
Search <input type='text' name='sTerm' id='sTerm'>
<select name='sCat' id='sCat'>
  <option value='0'>All</option>
  <option value='1'>Books</option>
  <option value='2'>Movies</option>
</select>
<input type='submit' value='Go'>
</form>

<table id="tableId">
<tbody id="tbodyId">
<tr><td>

</td></tr>
</tbody>
</table>

//assignment-- check whether username is available. Show username not available if already in dataabse.