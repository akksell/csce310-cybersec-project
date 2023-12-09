<?= $this->extend('shared/layout') ?>
<?
$suser = sessionUser();
if (isset($suser)) {
  echo sessionUser()->First_Name;
} else {
  echo "No User";
}
?>