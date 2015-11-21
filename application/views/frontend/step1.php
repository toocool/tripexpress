<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Trip Express front-end</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/datetimepicker.min.css" rel="stylesheet">

    <!-- METRO UI CSS 2.0 FONTS -->
    <link href="http://localhost/tripexpress/css/iconFont.min.css" rel="stylesheet">

    <!-- Login form CSS -->
    <link href="<?php echo base_url(); ?>css/frontend.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Trip Express</h3>
      </div>
     </div> <!-- /container -->

      <hr/>

      <div class="container">
      <div class="row">
          <div class="col-sm-12 col-md-3">
            <div class="thumbnail steps_filter">
                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs ticket_type_filter" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">One way</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Returning</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="form-group">
                            <label for="city">Qyteti i nisjes</label>
                            <select class="form-control" name="from" id="from">
                                <option value="0"></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Qyteti i mbërritjes</label>
                            <select class="form-control" name="from" id="from">
                                <option value="0"></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Data e nisjes</label>
                            <select class="form-control" name="from" id="from">
                                <option value="0"></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Bileta</label>
                            <select class="form-control" name="from" id="from">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" id="check" class="btn btn-success" value="submit"><span class="icon-search"></span> Kërko</button>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="form-group">
                            <label for="city">Qyteti i nisjes</label>
                            <select class="form-control" name="from" id="from">
                                <option value="0"></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Qyteti i nisjes</label>
                            <select class="form-control" name="from" id="from">
                                <option value="0"></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Qyteti i nisjes</label>
                            <select class="form-control" name="from" id="from">
                                <option value="0"></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Qyteti i nisjes</label>
                            <select class="form-control" name="from" id="from">
                                <option value="0"></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Bileta</label>
                            <select class="form-control" name="from" id="from">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" id="check" class="btn btn-success" value="submit"><span class="icon-search"></span> Kërko</button>
                        </div>
                    </div>
                  </div>

                </div>


            </div>
          </div>

          <div class="col-sm-12 col-md-9">
              <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Destination</th>
                      <th>Departure</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tetovo -> Stuttgart</td>
                      <td>16:00 12.01.2015</td>
                      <td>EUR 120</td>
                    </tr>
                    <tr>
                      <td>Tetovo -> Stuttgart</td>
                      <td>16:00 12.01.2015</td>
                      <td>EUR 120</td>
                    </tr>
                    <tr>
                      <td>Tetovo -> Stuttgart</td>
                      <td>16:00 12.01.2015</td>
                      <td>EUR 120</td>
                    </tr>
                    <tr>
                      <td>Tetovo -> Stuttgart</td>
                      <td>16:00 12.01.2015</td>
                      <td>EUR 120</td>
                    </tr>

                  </tbody>
                </table>
          </div>

        </div>

      <footer class="footer">
        <p>&copy; Company 2014</p>
      </footer>

    </div> <!-- /container -->


    <script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/docs.min.js"></script>
     <script src="<?php echo base_url(); ?>/js/moment.js"></script>
     <script src="<?php echo base_url(); ?>/js/datetimepicker.js"></script>

  </body>
</html>
