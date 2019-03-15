<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('netpro_logo.png') ?>
 <link href="../img/blogo1.png" rel="icon" type="image/png">
    <?= $this->Html->css(['bootstrap.min','fontawesome-all','news_post_styles'
            ,'news_post_responsive','teachers_styles','teachers_responsive','elements_responsive','elements_styles'
        ]) ?> 

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1><?= __('Error: Something Has Gone Wrong, Lets Run Home To Safety Please!') ?></h1>
        </div>
        <div id="content">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </div>
        <div id="footer">
            <?= $this->Html->link(__('Back'), 'javascript:history.back()') ?>
        </div>
    </div>
</body>
</html>
