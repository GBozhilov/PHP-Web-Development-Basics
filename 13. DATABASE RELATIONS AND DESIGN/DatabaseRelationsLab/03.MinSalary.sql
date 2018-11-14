SELECT `department_id`,
ROUND(MIN(`salary`), 2) `min_salary`
FROM `employees`
WHERE `salary` > 800
GROUP BY `department_id`;