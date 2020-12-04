<?php 
class Task1 {
  function get_parent_category()
  {
    include 'database.php';
    $category = "
    SELECT
      category.*,
      IFNULL(catetory_relations.ParentcategoryId, 0) as ParentId
    FROM
      category
    LEFT JOIN catetory_relations ON catetory_relations.categoryId = category.Id
    ORDER BY
      `category`.`Id` ASC
    ";
    $result = $conn->query($category);

    if ($result->num_rows > 0) {
      return $result;
    } else {
      return 0;
    }
    $conn->close();
  }
}