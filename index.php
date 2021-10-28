<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
  <div class="Wrapper">
    <div class="Container">
      <div class="BehindContainer">
        <div class="TeacherSide">
          <p>Login as <span id="teacher">TEACHER</span></p>
        </div>
        <div class="StudentSide">
          <p>Login as <span id="student">STUDENT</span></p>
        </div>
      </div>
      <div class="ContentWrapper">
        <p class="Logo">YOU ARE A <span id="content">TEACHER</span></p>
        <div class="FormWrapper">
          <form class="TeacherWrapper">
            <div class="TeacherForm">
              <div class="InputWrapper">
                <i class='fas fa-user-alt icon'></i>
                <input name="username" placeholder="Username" type="text" class="input" autocomplete="off"/>
              </div>
              <div class="InputWrapper">
                <i class='fas fa-key icon'></i>
                <input name="password" placeholder="Password" type="password" class="input"/>
              </div>
              <input name="type" value="1" class="Hide"/>
              <button type="submit" class="TeacherButton">Login</button>
            </div>
          </form>
          <form class="StudentWrapper">
            <div class="StudentForm">
              <div class="InputWrapper">
                <i class='fas fa-user-alt icon'></i>
                <input name="username" placeholder="Username" type="text" class="input" autocomplete="off"/>
              </div>
              <div class="InputWrapper">
                <i class='fas fa-key icon'></i>
                <input name="password" placeholder="Password" type="password" class="input"/>
              </div>
              <input name="type" value="2" class="Hide"/>
              <button type="submit" class="StudentButton">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="./index.js"></script>
</body>
</html>
