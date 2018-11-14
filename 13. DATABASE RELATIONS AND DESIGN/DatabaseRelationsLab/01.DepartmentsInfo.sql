SELECT `department_id`, COUNT(*) `Number of employees`
FROM `employees`
GROUP BY `department_id`;