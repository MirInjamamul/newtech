<?php

 ?>
<!DOCTYPE html>
<html ng-app="bmiApp">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BMI Calculator</title>

  <!-- Stylesheets -->
  <link data-require="bootstrap-css@3.1.1" data-semver="3.1.1" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<!-- Main Content starts here -->
<body data-ng-controller="bmiController">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="jumbotron text-center">BMI Calculator</h3>

        <form role="form">
          <div class="form-group">
            <div class="radio">
              <label>
                <input type="radio" ng-model="units" value="imperial">
                <span class="label label-danger">Imperial</span>
              </label>
            </div>

            <div class="radio">
              <label>
                <input type="radio" ng-model="units" value="metric">
                <span class="label label-success">Metric</span>
              </label>
            </div>

          </div>

          <div id="metric" ng-show="units == 'imperial'">
            <div class="form-group">
              <label for="weight">Weight (lb):</label>
              <input type="number" ng-model="weight_lb"
              id="weight"
              placeholder="weight in lb" class="form-control">
            </div>

            <div class="form-group">
              <label for="weight_foot">Height (foot):</label>
              <input type="number" ng-model="height_foot"
              id="weight_foot"
              placeholder="height in foot" class="form-control">
            </div>

            <div class="form-group">
              <label for="height_inch">Height (inch):</label>
              <input type="number" ng-model="height_inch"
              id="height_inch"
              placeholder="height in inch" class="form-control">
            </div>
          </div>

          <div id="metric" ng-show="units == 'metric'">
            <div class="form-group">
              <label for="weight_kg">Weight (kg):</label>
              <input type="number" ng-model="weight_kg"
              id="weight_kg"
              placeholder="weight in kg" class="form-control">
            </div>

            <div class="form-group">
              <label for="height_cm">Height (cm):</label>
              <input type="number" ng-model="height_cm"
              id="height_cm"
              placeholder="height in cm" class="form-control">
            </div>

          </div>
        </form>

        <!-- Calculated BMI is shown here -->
        <div class="well text-center">
          <h3 class="text-muted">Calculated BMI</h3>
          <h2><span class="label label-{{catClass}}" title="{{catTitle}}">{{bmi | number:1}}</span></h2>
          <h4 class="text-muted">{{catTitle}}</h4>
        </div>

        <!-- Please email in case of any comments/feedback -->
        <footer class="text-muted pull-right">
          
        </footer>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
  <script data-require="bootstrap@3.1.1" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script data-require="angular.js@1.2.13" data-semver="1.2.13" src="http://code.angularjs.org/1.2.13/angular.js"></script>
  <script src="js/bmi/script.js"></script>
</body>
</html>
