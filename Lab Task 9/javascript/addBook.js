function titleVal() {
        var title=document.getElementById("title").value;
        //document.getElementById("usernameErr").innerHTML= "khbjhvbj";

        var regex= /^[a-zA-Z][a-zA-Z.\_\-]+ +[a-zA-Z.\-\_]+/ ;


        if (regex.test(title)) {
            document.getElementById("titleErr").innerHTML= "";
            //return true;
            //document.getElementById("username").style.backgroundColor="Green";
            
        }
        else
        {

            //document.getElementById("username").style.backgroundColor="RED";

            document.getElementById("titleErr").innerHTML= "Contain a-z, A-Z  and at least two words";
        }


    }


    function authorVal() {
        var author=document.getElementById("athorName").value;
        var regex= /^[0-9a-zA-Z@%#$]{8,}$/ ;
        

        if (regex.test(author)) {
            document.getElementById("passwordErr").innerHTML= ""; 
        }
        else
        {
            document.getElementById("passwordErr").innerHTML= "At least 8 and No use of special characters (space,@, #, $, %)";
        }


    }

    function authorVal() {
        var author=document.getElementById("authorName").value;
        var regex= /^[a-zA-Z][a-zA-Z.\_\-]+ +[a-zA-Z.\-\_]+/ ;
        

        if (regex.test(author)) {
            document.getElementById("authorErr").innerHTML= ""; 
        }
        else
        {
            document.getElementById("authorErr").innerHTML= "Contain a-z, A-Z  and at least two words";
        }
    }


    function editionVal() {
        var author=document.getElementById("edition").value;
        var regex= /^[0-9]+/ ;
        

        if (regex.test(author)) {
            document.getElementById("editionErr").innerHTML= ""; 
        }
        else
        {
            document.getElementById("editionErr").innerHTML= "Only positive can allow";
        }
    }


    
