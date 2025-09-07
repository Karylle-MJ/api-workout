Workout Schedule API

A simple RESTful API built with Laravel 12 that allows users to **manage their workout schedules** for each day of the week.  
You can retrieve and update schedules using GET and PUT methods.

---

**Features**
- Retrieve a workout schedule for a specific day.
- Update an existing workout schedule.
- JSON-based API, easy to integrate with mobile and web apps.

---

**Installation & Setup**
  **Requirements**
- PHP >= 8.1
- Composer
- MySQL
- Laravel 12

**Steps**
1. Clone the repository:
   
   git clone https://github.com/your-username/workout-api.git
   cd workout-api
   

2. Install dependencies:
   
   composer install
   

3. Copy the example environment file and configure database settings:
   
   cp .env.example .env
   
   Update `.env`:
   
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=workout_api
   DB_USERNAME=root
   DB_PASSWORD=
   

4. Generate the application key:
   
   php artisan key:generate
   

5. Run migrations and seed initial data:
   
   php artisan migrate --seed
   

6. Start the development server:
   
   php artisan serve
   
   API will be available at: **http://127.0.0.1:8000/api**

---

**API Endpoints**

  **1. GET Schedule for a Day**
    **Request:**

    GET /api/schedule/wednesday

   **Response:**

{
  "day": "wednesday",
  "workout_title": "Leg Day",
  "details": "Quads + Hamstrings",
  "is_rest": false
}

---

**2. PUT Update an Existing Schedule**
   **Request:**
   
    PUT /api/schedule/wednesday

   **Body (JSON):**

{
  "workout_title": "Leg Day (Updated)",
  "details": "Leg focus with added lunges",
  "is_rest": false
}

**Response:**

{
  "message": "Schedule updated successfully",
  "data": {
    "day": "wednesday",
    "workout_title": "Leg Day (Updated)",
    "details": "Leg focus with added lunges",
    "is_rest": false
  }
}

