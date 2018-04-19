<?php

require_once "tools.php";
//如果说是post请求，那么就执行添加操作。并且就结束。不再往下执行。
$db = conn();
if($_SERVER['REQUEST_METHOD']=="POST"){
    //print_r($_POST);
    $type_id = post("type");
    $title = post("title");
    $content = post("content");

    $sql = 'insert into qy_article(type_id, `title`, content) values(:type_id,:title,:content)';
    $stmt = $db->prepare($sql);
    $stmt->execute([':type_id'=>$type_id, ':title'=>$title, ':content'=>$content]);
    $row = $stmt->rowCount();
    if($row>0){
        //即使跳转了，后面的语句依然会继续执行
        header("Location:articlelist.php");
    }
//    file_put_contents("./1.txt","out");
    exit ("你出错啦");
}
$sql = "select * from qy_type";
$stmt = $db->prepare($sql);
$stmt->execute();
$types = $stmt->fetchAll();
?>
<?php require_once "top.php"; ?>
<?php require_once "header.php"; ?>
<?php require_once "side.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            添加文章
            <small>it all starts here</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">添加文章</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>文章标题</label>
                        <input type="text" class="form-control" name="title" />
                    </div>
                    <div class="form-group">
                        <label>选择分类</label>
                        <select name="type" class="form-control">
                            <option>选择分类</option>
                            <?php foreach ($types as $type){?>
                                <option value="<?=$type['id']?>"><?=$type['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>文章内容</label>
                        <script id="container" name="content" type="text/plain"></script>                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="添加文章" />
                    </div>

                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once "footer.php";?>
<script type="text/javascript" src="editor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="editor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>
</body>
</html>