<!DOCTYPE html>
<html>
  <head>
    <title>School {{ $School->schoolId }}</title>
  </head>
  <body>
    <h1>School {{ $School->schoolId }}</h1>
    <ul>
      <li>email_address: {{ $School->email_address }}</li>
      <li>cluster_code: {{ $School->cluster_code }}</li>
      <li>school_name: {{ $School->school_name }}</li>
    </ul>
  </body>
</html>
