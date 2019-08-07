<?php
require("tpl/header.php")
?>


    <form class="form-horizontal" action="dopublish.php" method="post">
        <div class="form-group">
            <label for="inputapi" class="col-sm-2 control-label">api 密匙</label>
            <div class="col-sm-5">
            <input type="text" class="form-control" id="inputapi" value="=EcOAc91HsQhnT70c3TlCChb1=s=" name="api">
            </div>
        </div>
        <div class="form-group">
            <label for="inputoreder" class="col-sm-2 control-label">指令</label>
            <div class="col-sm-5">
            <input type="text" class="form-control" id="inputorder" value="APP+DTSW=fC" name="order">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">发出警报</button>
            </div>
        </div>
    </form>

<?php
  require_once('tpl/footer.php');
?>