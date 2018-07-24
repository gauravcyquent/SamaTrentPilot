function minmax(value, min, max) 
{
    if(parseInt(value) < min || isNaN(value)) 
        return 0; 
    else if(parseInt(value) > max) 
        return 2000; 
    else return value;
}