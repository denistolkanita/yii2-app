# Lesson 4
Yii2:       http://localhost:8001/
PhpMyAdmin: http://localhost:8080/
Mysql cli: docker exec -it yii2-app-db-1 bash && cd var/lib/mysql && mysql -u root -p 1234

rularead migratiilor: `yii migrate`
crearea unei migratii noi: `yii migrate/create migration_name`

# Lesson 9
Exemplu de link dinamic: `Url::to(['view/method', 'id' => $article->id])`
Verficarea tipului request-ului: `Yii::$app->request->isGet()` sau `...isPost()`
