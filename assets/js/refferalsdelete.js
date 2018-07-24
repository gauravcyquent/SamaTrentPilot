


function delete_id(id)
{
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='<?php echo base_url();?>Referrals/deleteReffrals/'+id;
     }
}

