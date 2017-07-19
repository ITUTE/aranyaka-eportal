<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
/*$(document).ready(function(){
	$("input").click(function(){
        alert($("input").attr('id'));
    });
});*/
function func(Id)
{
	$.post("_try4.php",
        {
          name: "Donald Duck",
          city: "Duckburg",
		  id: Id
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
}	
</script>
</head>	
<body>

<input type="submit" name="1" value="Submit1" id="1" onclick="func(this.id)"/>
<input type="submit" name="2" value="Submit2" id="2" onclick="func(this.id)"/>
<input type="submit" name="3" value="Submit3" id="3" onclick="func(this.id)"/>

</body>
</html>
