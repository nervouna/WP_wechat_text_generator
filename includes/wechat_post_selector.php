<div class="wrap">
  <h2>微信公众号文章格式转换器</h2>
  <hr>
  <div  style="width: 40%;float:left;min-width: 300px;">
    <h3>在这里输入文章 ID</h3>
    <form action="" method="post">
      <table id="postSelector">
        <tr>
          <td><input placeholder="文章ID" name="posts[]" type="text" /></td>
        </tr>
        <tr>
          <td><input placeholder="文章ID" name="posts[]" type="text" /></td>
        </tr>
        <tr>
          <td><input placeholder="文章ID" name="posts[]" type="text" /></td>
        </tr>
        <tr>
          <td><input placeholder="文章ID" name="posts[]" type="text" /></td>
        </tr>
        <tr>
          <td><input placeholder="文章ID" name="posts[]" type="text" /></td>
        </tr>
      </table>
      <p class="submit">
        <input type=button class="button button-default" onclick=OneMorePost() value="再加一条">
        <input type=submit class="button button-primary" value="提交" />
      </p>
    </form>
  </div>
  <script type="text/javascript">
  function OneMorePost () {
    var formTable = document.getElementById('postSelector');
    var myTr = document.createElement('tr');
    var myTd = document.createElement('td');
    var myInput = document.createElement('input');
    myInput.setAttribute('name', 'posts[]');
    myInput.setAttribute('type', 'text');
    myInput.setAttribute('placeholder', '文章ID')
    myTd.appendChild(myInput);
    myTr.appendChild(myTd);
    formTable.appendChild(myTr);
  }
  </script>
