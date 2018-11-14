SELECT `department_id`,
ROUND(AVG(`salary`), 2) `average_salary`
FROM `employees`
GROUP BY `department_id` ASC;