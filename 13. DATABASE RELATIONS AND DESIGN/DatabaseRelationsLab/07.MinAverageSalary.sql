SELECT AVG(`salary`) AS `avg`
FROM `employees`
GROUP BY `department_id`
ORDER BY `avg` ASC
LIMIT 1;