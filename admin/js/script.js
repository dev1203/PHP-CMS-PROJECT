setTimeout(function(){
    if( $('.message').is(':visible') )
        $(".message").fadeOut(4000);
},100);

var request;
$('#add_post').submit((event)=>{

    event.preventDefault();
    if (request) {
        request.abort();
    }
    var $form = $(this);

    var $inputs = $("#title-add");
    console.log($inputs);

    var serializedData = $inputs.serialize();

    $inputs.prop("disabled", true);

    console.log(serializedData);

    request = $.ajax({
        url: './add_post.php',
        type: 'post',
        data: serializedData
    });

    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});