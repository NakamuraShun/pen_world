<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
// $class = 'message';
// if (!empty($params['class'])) {
//     $class .= ' ' . $params['class'];
// }
// if (!isset($params['escape']) || $params['escape'] !== false) {
//     $message = h($message);
// }
// ?>
<?php /* 
<div class="<?= h($class) ?>" onclick="this.classList.add('hidden');"><?= $message ?></div>
 */ ?>
 
<div class="<?php echo $params['class'] ?> pointer margin_v_small" onclick="this.classList.add('display_none')">
	<?= h($message) ?>
</div>
