<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
                   <?= h($message) ?>
  </div>

<div class="alert alert-danger fade in alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong><?= $message ?></strong>
                          </div>
