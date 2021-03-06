$(document).ready(function(){
    
    $("#submit").click(function(){
        var credit=$('#credit').val();
        var debit=$('#debit').val();                
        var credit_d=$('#credit_d').val();
        var debit_d=$('#debit_d').val();                
        
        $.ajax({
            type: 'POST',
            url: 'activity.php',
            data: { credit : credit,  debit : debit ,credit_d : credit_d , debit_d : debit_d},
            success: function(response) {
                console.log("UPDATED THE BALANCE");
                alert('UPDATED SUCCESSFLLY');
                
            }
        });

    })
    $("#checkbalance").click(function(){
        $('#checkbalance1').load('checkbalance.php', function(){
            console.log("checkbalance");
        });
    })

});