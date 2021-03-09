<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Book List</title>
  </head>
  <body>
 <div class="header">
      <?php include 'header.php';?>
  </div>
  
  	<center>
  	<h1>Book List</h1>

     <style> table, th, td 
     {
      border: 1px solid black;
      border-collapse: collapse;
      }
    th, td {
      padding: 15px;
         }

         th {
  text-align: center;
           }

           td {
  text-align: center;
        }

</style>

<?php
$a="sherlock2.jpg";
?>


 <table>


        <tr>
                <th>Book Thumbnail</th>
                <th>Book Id</th>
                <th>Book Title</th>
                <th>Book Author</th>
                <th>Book Publisher</th>
                <th>Book Edition </th>
                <th>Book Price</th>
        </tr>

        <tr>
                <td><img src="<?php echo $a ?>" alt="The Adventures of Sherlock Holmes" width="200" height="200" ></td>
                <td>AAA11</td>
                <td>The Adventures of Sherlock Holmes</td>
                <td>Arthur Conan Doyle</td>
                <td>George Newnes</td>
                <td>1st Edition,October 14, 1892</td>
                <td>TK. 750</td>
             
        </tr>
        <tr>
                <td><img src="megh.jpeg" alt="মেঘপিওন" width="200" height="200" ></td>
                <td>BBB21</td>
                <td>মেঘপিওন</td>
                <td>রেশমী রফিক</td>
                <td>পেন্সিল পাবলিকেশনস</td>
                <td>1st Published, 2020</td>
                <td>TK. 470</td>
        </tr>

        <tr>
                <td><img src="harry.jpg" alt="harry" width="200" height="200" ></td>
                <td>CCC31</td>
                <td>Harry Potter and the Philosopher's Stone</td>
                <td>J. K. Rowling</td>
                <td>Bloomsbury</td>
                <td>1st Published, 26 June, 1997(UK)</td>
                <td>TK. 900</td>
        </tr>

         <tr>
                <td><img src="rashed.jpg" alt="harry" width="200" height="200" ></td>
                <td>DDD41</td>
                <td>আমার বন্ধু রাশেদ</td>
                <td>মুহম্মদ জাফর ইকবাল</td>
                <td>কাকলী প্রকাশনী</td>
                <td>28th Edition, 2015</td>
                <td>TK. 155</td>
        </tr>

        <tr>
                <td><img src="game.jpg" alt="game" width="200" height="200" ></td>
                <td>EEE51</td>
                <td>A Game of Thrones(A Song of Ice and Fire, Book 1)</td>
                <td>George R. R. Martin</td>
                <td>Bantam</td>
                <td>1st Edition, March 22, 2011</td>
                <td>TK. 1800</td>
        </tr>


</table>
     </center>
    </body>
</html>