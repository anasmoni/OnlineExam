---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Drawing    

APIs for drawing images 
of the given figure.
<!-- START_37fe7cec1659a06b7d0ff8a090797a54 -->
## Show
shows the front end. It contains
the picture to draw &amp; a painting tool
to draw it.

> Example request:

```bash
curl -X GET -G "http://localhost/kidszone" 
```

```javascript
const url = new URL("http://localhost/kidszone");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET kidszone`


<!-- END_37fe7cec1659a06b7d0ff8a090797a54 -->

#Exam    

APIs for participating in the exams 
according to the selected subject,topics 
and the number of questions,which user provides
from the front end.
<!-- START_851410629f219819c5341ec269623ddb -->
## Participate in the exam

> Example request:

```bash
curl -X POST "http://localhost/myexams" \
    -H "Content-Type: application/json" \
    -d '{"subject":"sed","topics":"sed","NumberOfQuestions":6}'

```

```javascript
const url = new URL("http://localhost/myexams");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "subject": "sed",
    "topics": "sed",
    "NumberOfQuestions": 6
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST myexams`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    subject | string |  required  | the subject the examinee is willing to take part.
    topics | string |  required  | Selected topics from that particular subject.
    NumberOfQuestions | integer |  required  | How many questions will appear in the exam?

<!-- END_851410629f219819c5341ec269623ddb -->

#Filtering    

APIs for filtering questions 
based on some subject / topics.
<!-- START_42fcef33bd393249c3d27aced54501ba -->
## Filter

> Example request:

```bash
curl -X POST "http://localhost/FilterQBank" \
    -H "Content-Type: application/json" \
    -d '{"string":"enim"}'

```

```javascript
const url = new URL("http://localhost/FilterQBank");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "string": "enim"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST FilterQBank`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    string | topic |  optional  | which topic's question the user is willing to filter

<!-- END_42fcef33bd393249c3d27aced54501ba -->

<!-- START_af60a0d72e4e3d07117a776e392efbbd -->
## Show questions
shows all the questions in different view(blade)

> Example request:

```bash
curl -X GET -G "http://localhost/ShowQBank" 
```

```javascript
const url = new URL("http://localhost/ShowQBank");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET ShowQBank`


<!-- END_af60a0d72e4e3d07117a776e392efbbd -->

#Geometry

It gives some geometrical problems to the kids.
Kids try to solve it by drawing & hence their geometrical knowledge is improved.
<!-- START_e9eac7b556f56c56477c1eb72fe33984 -->
## Hexagone
Tells the user to draw one-sixth th of a hexagone;

> Example request:

```bash
curl -X GET -G "http://localhost/hexagone" 
```

```javascript
const url = new URL("http://localhost/hexagone");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET hexagone`


<!-- END_e9eac7b556f56c56477c1eb72fe33984 -->

<!-- START_8c12700ed9265979923bf44f961e351e -->
## Triangle
Tells the user to draw one-third of a triangle.

> Example request:

```bash
curl -X GET -G "http://localhost/triangle" 
```

```javascript
const url = new URL("http://localhost/triangle");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET triangle`


<!-- END_8c12700ed9265979923bf44f961e351e -->

<!-- START_a8185406aeec8a67fa0a8cf55d9939a1 -->
## Triangle0
Tells the user to draw half of a triangle.

> Example request:

```bash
curl -X GET -G "http://localhost/triangle0" 
```

```javascript
const url = new URL("http://localhost/triangle0");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET triangle0`


<!-- END_a8185406aeec8a67fa0a8cf55d9939a1 -->

#MCQ 

APIs for inserting mcq for the exam.
Each mcq has problem statement , correct option,
all other options , difficulty ,from which subject this question
belongs to along with the topic.
<!-- START_5fe34e1ab6f389b2daa30d10ec535d83 -->
## Index
Shows the application dashboard,
most importantly the front UI.

> Example request:

```bash
curl -X GET -G "http://localhost/addmcq" 
```

```javascript
const url = new URL("http://localhost/addmcq");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET addmcq`


<!-- END_5fe34e1ab6f389b2daa30d10ec535d83 -->

<!-- START_578b1a3afc091da780fe82d44bed1e77 -->
## InsertMCQ

> Example request:

```bash
curl -X POST "http://localhost/mcqInsert" \
    -H "Content-Type: application/json" \
    -d '{"question":"facere","image":"ea","subject":"inventore","topic":"enim","short_note":"numquam","difficulty":6,"correct_option":18,"options":"doloribus"}'

```

```javascript
const url = new URL("http://localhost/mcqInsert");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "question": "facere",
    "image": "ea",
    "subject": "inventore",
    "topic": "enim",
    "short_note": "numquam",
    "difficulty": 6,
    "correct_option": 18,
    "options": "doloribus"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST mcqInsert`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    question | string |  required  | the problem statement
    image | string |  required  | if the question contains any image
    subject | string |  required  | which subjects question the user is willing to filter
    topic | string |  required  | which topic the question belongs to
    short_note | string |  required  | short tutorial of about the answer
    difficulty | integer |  required  | the problem's difficulty in the range from 1 to 4
    correct_option | integer |  required  | correct option of the question
    options | string |  required  | all options of the question

<!-- END_578b1a3afc091da780fe82d44bed1e77 -->

#Participation    

APIs for showing all the previous participations of the user. 
From which he can get an overall overview of his performance.
<!-- START_f7b62348b5ae10bc88ff22fd44c91001 -->
## Show all participations
shows all the participations of the user along with score,
the exam&#039;s topic, subject and date-time.

> Example request:

```bash
curl -X GET -G "http://localhost/showParticipations" 
```

```javascript
const url = new URL("http://localhost/showParticipations");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET showParticipations`


<!-- END_f7b62348b5ae10bc88ff22fd44c91001 -->

<!-- START_de0eec93d829687bb533f887d1bd5a18 -->
## Testing
For testing purpose

> Example request:

```bash
curl -X GET -G "http://localhost/test1" 
```

```javascript
const url = new URL("http://localhost/test1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET test1`


<!-- END_de0eec93d829687bb533f887d1bd5a18 -->

<!-- START_a5f4cec46371460b3460d28f13b78e5e -->
## Show all participations
shows all the participations of the user along with score,
the exam&#039;s topic, subject and date-time.

> Example request:

```bash
curl -X GET -G "http://localhost/myScript" 
```

```javascript
const url = new URL("http://localhost/myScript");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET myScript`


<!-- END_a5f4cec46371460b3460d28f13b78e5e -->

<!-- START_fb68bfaec2282f4a9c2b85e295892b44 -->
## Show participations according to the user input topics
shows all the participations of the user along with score,
the exam&#039;s topic, subject and date-time depending on the selected topic

> Example request:

```bash
curl -X POST "http://localhost/test2" \
    -H "Content-Type: application/json" \
    -d '{"string":"ea"}'

```

```javascript
const url = new URL("http://localhost/test2");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "string": "ea"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST test2`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    string | Topic |  optional  | Which topics participation the user is willing to filter?

<!-- END_fb68bfaec2282f4a9c2b85e295892b44 -->

#Questions_Showing   

APIs for showing the options of the mcqs.
<!-- START_96e66d267a0d6fc5fba9b2b3651538ed -->
## Show all options of the question.

shows all the options in different view(blade) along with the corresponding question.

> Example request:

```bash
curl -X GET -G "http://localhost/ShowQuestions" 
```

```javascript
const url = new URL("http://localhost/ShowQuestions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET ShowQuestions`


<!-- END_96e66d267a0d6fc5fba9b2b3651538ed -->

<!-- START_9eab88f57be51ac29713127f2f7d8c36 -->
## InsertAnsSheet
Users anssheet is inserted in the database which contains the chosen options(by the user),
his calculated score , the questions used in this exam.

> Example request:

```bash
curl -X GET -G "http://localhost/ShowAnsSheet" \
    -H "Content-Type: application/json" \
    -d '{"string":"asperiores"}'

```

```javascript
const url = new URL("http://localhost/ShowAnsSheet");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "string": "asperiores"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET ShowAnsSheet`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    string | chosenOps |  optional  | which options the user has chosen in the mcq exam

<!-- END_9eab88f57be51ac29713127f2f7d8c36 -->

<!-- START_aae6d73786d9a63c7d1aad115abe0f49 -->
## InsertAnsSheet
Users anssheet is inserted in the database which contains the chosen options(by the user),
his calculated score , the questions used in this exam.

> Example request:

```bash
curl -X POST "http://localhost/ansSheetInsert" \
    -H "Content-Type: application/json" \
    -d '{"string":"eum"}'

```

```javascript
const url = new URL("http://localhost/ansSheetInsert");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "string": "eum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST ansSheetInsert`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    string | chosenOps |  optional  | which options the user has chosen in the mcq exam

<!-- END_aae6d73786d9a63c7d1aad115abe0f49 -->

#Script   

APIs for showing the editorial page.
<!-- START_461d3d4a9eca29a294c91963c1dad1cb -->
## ShowEditorialAndEverything
Shows details of the exam.

> Example request:

```bash
curl -X POST "http://localhost/ShowScript" 
```

```javascript
const url = new URL("http://localhost/ShowScript");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST ShowScript`


<!-- END_461d3d4a9eca29a294c91963c1dad1cb -->

#SetModelTest   

APIs for adding new subjects & topics from the admin panel.
<!-- START_7bcb3564e9739ea4f76876c943e45d41 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET -G "http://localhost/setModelTest" 
```

```javascript
const url = new URL("http://localhost/setModelTest");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET setModelTest`


<!-- END_7bcb3564e9739ea4f76876c943e45d41 -->

<!-- START_7c95bece2988e167cdef6331f83b949c -->
## InsertMcqSheet
New exam is inserted in the exam&#039;s table.

> Example request:

```bash
curl -X POST "http://localhost/setMTestInsert" 
```

```javascript
const url = new URL("http://localhost/setMTestInsert");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST setMTestInsert`


<!-- END_7c95bece2988e167cdef6331f83b949c -->

#Subject_Topic   

APIs for adding new subjects & topics from the admin panel.
<!-- START_53cfa05988878901ae873a94387ed9b7 -->
## ShowSubjectTopic
Shows all the subjects &amp; topics currently available in the database.

> Example request:

```bash
curl -X GET -G "http://localhost/AddSubject" 
```

```javascript
const url = new URL("http://localhost/AddSubject");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET AddSubject`


<!-- END_53cfa05988878901ae873a94387ed9b7 -->

<!-- START_e403b891bbbae31684e1ec8ab98ddd14 -->
## AddNewSubject/Topic
From this UI , the admin adds new subject &amp; topic.

> Example request:

```bash
curl -X POST "http://localhost/TestSubject" \
    -H "Content-Type: application/json" \
    -d '{"string":"aut"}'

```

```javascript
const url = new URL("http://localhost/TestSubject");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "string": "aut"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST TestSubject`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    string | topic |  optional  | which topic just appeared

<!-- END_e403b891bbbae31684e1ec8ab98ddd14 -->

#general


<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET -G "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST "http://localhost/logout" 
```

```javascript
const url = new URL("http://localhost/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET -G "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "http://localhost/password/email" 
```

```javascript
const url = new URL("http://localhost/password/email");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset/1" 
```

```javascript
const url = new URL("http://localhost/password/reset/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET -G "http://localhost/home" 
```

```javascript
const url = new URL("http://localhost/home");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_89966bfb9ab533cc3249b91a9090d3dc -->
## users
> Example request:

```bash
curl -X GET -G "http://localhost/users" 
```

```javascript
const url = new URL("http://localhost/users");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET users`


<!-- END_89966bfb9ab533cc3249b91a9090d3dc -->

<!-- START_d0ea430f2f9ff9ef1412720512bdae84 -->
## showprofile/{name?}
> Example request:

```bash
curl -X GET -G "http://localhost/showprofile/1" 
```

```javascript
const url = new URL("http://localhost/showprofile/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET showprofile/{name?}`


<!-- END_d0ea430f2f9ff9ef1412720512bdae84 -->


