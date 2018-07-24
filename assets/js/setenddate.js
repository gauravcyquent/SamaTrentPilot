function setEndDate(str) {
var x = document.getElementById("starts").value;

 if(str == 'Visit')
{
var dt = new Date(x);

dt.setMinutes(dt.getMinutes() + 90);
dt = dt.getFullYear() + "/" + ('0' + (dt.getMonth() + 1)).slice(-2) + "/" + ('0' + dt.getDate()).slice(-2) + " " + ('0' + dt.getHours()).slice(-2) + ":" + ('0' + dt.getMinutes()).slice(-2) + ":" + ('0' + dt.getSeconds()).slice(-2);

//dt.setMinutes(90);
//dt.setMinutes(dt.getMinutes() + 90);
document.getElementById ("ends").value = dt ;

}

else if(str == 'Call')
{
var dt = new Date(x);

dt.setMinutes(dt.getMinutes() + 30);
dt = dt.getFullYear() + "/" + ('0' + (dt.getMonth() + 1)).slice(-2) + "/" + ('0' + dt.getDate()).slice(-2) + " " + ('0' + dt.getHours()).slice(-2) + ":" + ('0' + dt.getMinutes()).slice(-2) + ":" + ('0' + dt.getSeconds()).slice(-2);

//dt.setMinutes(90);
//dt.setMinutes(dt.getMinutes() + 90);
document.getElementById ("ends").value = dt ;

} 


else
{
	document.getElementById ("ends").value = x ;
	
}




}