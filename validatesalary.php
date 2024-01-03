<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salary Validation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: green;
      margin: 111;
      padding: 100;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
  background: url("https://www.zdnet.com/a/img/resize/7928be58006d42770318cb8b31ab52fe25e1345e/2022/10/27/0089a944-0148-4741-a449-9607bf810e2a/gettyimages-1125756387.jpg?auto=webp&width=1280");
}

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #4caf50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    p {
      color: red;
      margin-top: 0;
    }

    #continueButton {
      display: none;
    }

    #validateButton {
      display: inline-block;
    }
  </style>
</head>
<body>
  <form id="salaryForm">
    <label for="salary">Select your salary range:</label>
    <select id="salary" name="salary" required>
      <option value="0-100000">RM0 - RM100,000</option>
      <option value="100001-999000">RM100,001 - RM999,000</option>
      <option value="999001-1000000">RM999,001 - RM1,000,000</option>
    </select>
    <button id="validateButton" type="button" onclick="validateSalary()">Validate Salary</button>
    <p id="validationMessage"></p>
    <p id="rangeMessage"></p>
    <button id="continueButton" type="button" onclick="continueToDashboard()">Continue</button>
  </form>

  <script>
    function validateSalary() {
      // Get the selected salary range
      const salaryInput = document.getElementById('salary');
      const salaryRange = salaryInput.value.split('-');
      const minSalary = parseFloat(salaryRange[0]);
      const maxSalary = parseFloat(salaryRange[1]);

      // Validate the salary and display the message based on the range
      if (!isNaN(minSalary) && !isNaN(maxSalary)) {
        document.getElementById('validationMessage').innerText = '';
        const midPoint = (minSalary + maxSalary) / 2;
        if (midPoint <= 100000) {
          document.getElementById('rangeMessage').innerText = 'You are eligible to grab 5 items per receipt';
        } else if (midPoint <= 999000) {
          document.getElementById('rangeMessage').innerText = 'You are eligible to grab 4 items per receipt';
        } else {
          document.getElementById('rangeMessage').innerText = 'You are eligible to grab 3 items per receipt';
        }
        // Show the Continue button
        document.getElementById('continueButton').style.display = 'inline-block';
        // Hide the Validate Salary button
        document.getElementById('validateButton').style.display = 'none';
      } else {
        document.getElementById('validationMessage').innerText = 'Please select a valid salary range.';
        document.getElementById('validationMessage').style.color = 'red';
        document.getElementById('continueButton').style.display = 'none';
        document.getElementById('rangeMessage').innerText = '';
      }
    }

    function continueToDashboard() {
      // Redirect to dashboard.php when Continue is clicked
      window.location.href = 'dashboard.php';
    }
  </script>
</body>
</html>
