function getAllBooks() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("bookList").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","controller/getAllBook.php?",true);
    xmlhttp.send();
    return;
}


function getAllBooksDel() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("bookList").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","controller/getAllBookDel.php?",true);
    xmlhttp.send();
    return;
}



function showResult(str) {

    if (str.length==0) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("foodList").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","../controller/getAllFood.php?",true);
      xmlhttp.send();
      return;
    } else {

    document.getElementById("foodList").innerHTML=""; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("foodList").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../controller/getFood.php?q="+str,true);
    xmlhttp.send();
  }
}



function showResultBook(str) {

    if (str.length==0) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("bookList").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","controller/getAllBook.php?",true);
      xmlhttp.send();
      return;
    } else {

    document.getElementById("bookList").innerHTML=""; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("bookList").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","controller/getBook.php?q="+str,true);
    xmlhttp.send();
  }
}



function showResultBookDel(str) {

    if (str.length==0) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("bookList").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","controller/getAllBookDel.php?",true);
      xmlhttp.send();
      return;
    } else {

    document.getElementById("bookList").innerHTML=""; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("bookList").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","controller/getBookDel.php?q="+str,true);
    xmlhttp.send();
  }
}


function deleteBook(str) {

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("bookList").innerHTML = this.responseText;
      getAllBooks();
    }
  };
xmlhttp.open("GET","controller/deleteDone.php?q="+str,true);
xmlhttp.send();

  
}

