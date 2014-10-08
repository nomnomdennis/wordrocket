<?php require '../templates/header.php'; ?>
<div class="small-3 small-centered columns large-3 large-centered columns">
    <table>
        <thead>
            <tr>
                <th>List of words from previous days</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $days = query("SELECT DATEDIFF(CURDATE(), '2013-11-25') AS DiffDate");
                $categories = query("SELECT word FROM words WHERE id <= ?", $days[0]["DiffDate"]);

                foreach($categories as $category)
                {
                    $url = "browse.php?category=" . "{$category["word"]}";
                    print("<tr><td><a href=\"{$url}\">{$category["word"]}</a></td></tr>");
                }
            ?>
        </tbody>
    </table>
</div>

<?php require '../templates/footer.php'; ?>