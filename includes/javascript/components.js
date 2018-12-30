$( document ).ready(function() {
    console.log( "ready!" );


    $("#nav_1").on("click", function ($e){
        $e.preventDefault();
        $("#main_content").load("views/create_profile.php #content > *");
        $("#nav_1").addClass('active');
        $("#nav_2").removeClass('active');

    });
    $("#nav_2").on("click", function ($e){
        $e.preventDefault();
        $("#main_content").load("views/list_profile.php #content > *");
        $("#nav_2").addClass('active');
        $("#nav_1").removeClass('active');
    });
});