$(document).ready(function(){
      $.ajax({
        type: "GET",
        url: "books.xml",
        dataType: "xml",
        success: function(xml){
            
            tableStr = "<tr><th id='title'>Title</th><th id='author'>Author</th><th id='category'>Category</th><th id='year'>Year</th><th id='price'>Price</th></tr>";
            $(xml).find('book').each(function(){
                var author = "";
                var title = $(this).find('title').text();
                var authors = $(this).find('author');
                var year = $(this).find('year').text();
                var price = $(this).find('price').text();
                var category = $(this).attr('category');
                $(authors).each(function(){
                    author += " " + $(this).text() + ",";
                });
                tableStr += "<tr><td>" + title + "</td><td>" + author + "</td><td>" + category + "</td><td>" + year + "</td><td>" + price + "</td></tr>";
            });
            
            $("#books").append(tableStr);
        },
        error: function() {
            alert("An error occurred while processing XML file.");
        }
      });
    });
    