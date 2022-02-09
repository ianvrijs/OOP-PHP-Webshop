function confirm() {
    var txt;
if (confirm('Are you sure?'))
{
    document.getElementById("verwijder").submit();
}
else 
{
    txt = 'cancelled action.';
}
document.getElementById("msg").innerHTML = txt;
}