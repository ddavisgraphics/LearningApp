
</div>
<footer class="footer">
    <div class="container">
        <p> Copyright <?php print Date('Y'); ?> - David J. Davis  - MFA Thesis Project </p>
    </div>
</footer>

<!-- Template wide -->
<?php recurseInsert("includes/footerIncludes.php","php") ?>
<!-- Page specific -->
<?php recurseInsert("footerIncludes.php","php") ?>
</body>
</html>