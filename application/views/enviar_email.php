<body>
  

  <form action=<?php echo base_url('sendMailGmail'); ?> method="post">
    <label for="name">nombre</label><input id="name" type="text" name="name"><br/>
    <label for="email">email</label><input id="email" type="text" name="email"><br/>
    <label for="message">mensaje</label><textarea id="message" name="message" rows="8" cols="50"></textarea><br/>
    <input id="submit" type="submit" name="submit" value="submit">
  </form>