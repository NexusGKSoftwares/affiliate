**affiliate marketing system**
---

## **Expanded System Features**

### **User Features**
1. **Dashboard:**
   - Displays:
     - Total deposited money.
     - Total withdrawn money.
     - Current account balance.
   - Transaction summary (e.g., money spent on trivia games or products).

2. **Trivia Questions:**
   - Play quizzes to earn points or rewards.
   - Earn money through achievements or challenges.

3. **Transaction History:**
   - List all financial transactions (deposits, withdrawals, trivia-related payouts).

4. **Job Postings and Applications:**
   - Browse job postings.
   - Apply for jobs.
   - Post job advertisements (admin).

5. **Leaderboards and Rewards:**
   - Display top players based on trivia points or financial contributions.
   - Allow users to redeem points for rewards or withdraw equivalent money.

6. **Account Management:**
   - Profile page with account details.
   - Options to deposit/withdraw money.

---

### **Admin Features**
1. **Dashboard:**
   - Overview of system performance.
   - Total deposits, withdrawals, and system balance.
   - Active users and system engagement statistics.

2. **Trivia Management:**
   - Add, edit, or delete trivia questions.
   - Set difficulty levels and rewards.

3. **User Management:**
   - Approve or block users.
   - View user activities and transactions.

4. **Job Management:**
   - Review job postings.
   - Manage job categories.

5. **System Logs:**
   - Monitor user activities.
   - View transaction histories for all users.

---

### **Technical Stack**
- **Backend:** PHP (Laravel or core PHP)
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript (Bootstrap for responsiveness)
- **APIs:** REST APIs for communication between frontend and backend.

---

### **Database Structure**

#### **Users**
| Field            | Type         | Description                  |
|------------------|--------------|------------------------------|
| id               | INT          | Primary key                  |
| name             | VARCHAR(255) | User's name                  |
| email            | VARCHAR(255) | User's email                 |
| password         | VARCHAR(255) | Hashed password              |
| balance          | DECIMAL(10,2)| Account balance              |
| created_at       | TIMESTAMP    | Registration date            |

#### **Transactions**
| Field            | Type         | Description                  |
|------------------|--------------|------------------------------|
| id               | INT          | Primary key                  |
| user_id          | INT          | Foreign key to Users table   |
| amount           | DECIMAL(10,2)| Transaction amount           |
| type             | ENUM         | 'deposit', 'withdrawal'      |
| created_at       | TIMESTAMP    | Transaction timestamp        |

#### **TriviaQuestions**
| Field            | Type         | Description                  |
|------------------|--------------|------------------------------|
| id               | INT          | Primary key                  |
| question         | TEXT         | Trivia question              |
| options          | TEXT         | JSON string for options      |
| correct_option   | VARCHAR(255) | Correct answer               |
| reward           | DECIMAL(10,2)| Reward amount for correct answer |
| created_at       | TIMESTAMP    | Question creation date       |

#### **Jobs**
| Field            | Type         | Description                  |
|------------------|--------------|------------------------------|
| id               | INT          | Primary key                  |
| title            | VARCHAR(255) | Job title                    |
| description      | TEXT         | Job details                  |
| salary           | DECIMAL(10,2)| Job salary                   |
| posted_by        | INT          | Foreign key to Users table   |
| created_at       | TIMESTAMP    | Job posting date             |

---

### **Project Structure**

#### **Frontend (HTML + CSS + JS)**
```
online_marketing_system/
├── public/
│   ├── index.html         // Landing page
│   ├── dashboard.html     // Dashboard page
│   ├── trivia.html        // Trivia game page
│   ├── jobs.html          // Jobs page
│   ├── transactions.html  // Transaction history page
│   ├── assets/
│       ├── css/
│       ├── js/
│       ├── images/
```

#### **Backend (PHP + MySQL)**
```
backend/
├── api/
│   ├── user.php           // Handles user-related APIs
│   ├── transactions.php   // Handles transaction APIs
│   ├── trivia.php         // Handles trivia APIs
│   ├── jobs.php           // Handles job APIs
├── controllers/
│   ├── UserController.php
│   ├── TransactionController.php
│   ├── TriviaController.php
│   ├── JobController.php
├── models/
│   ├── User.php
│   ├── Transaction.php
│   ├── TriviaQuestion.php
│   ├── Job.php
├── config/
│   ├── database.php       // Database connection
│   ├── constants.php      // Global constants
```

---

### **Dashboard Design**

#### **Financial Overview**
- **Deposits:** Total deposits made by the user.
- **Withdrawals:** Total withdrawn by the user.
- **Balance:** Current balance in the account.

#### **Transaction History**
- Table view:
  - Transaction ID
  - Date
  - Type (Deposit/Withdrawal)
  - Amount

#### **Jobs Overview**
- List of recently posted jobs with links to view details.

---

### **Development Plan**
1. **Setup Environment:**
   - Install PHP and MySQL.
   - Create database and tables.

2. **Develop Backend APIs:**
   - User authentication and registration.
   - Deposit, withdrawal, and balance calculation logic.
   - Trivia functionality (randomized questions, rewards).
   - Job posting and application APIs.

3. **Frontend Implementation:**
   - Build responsive UI with Bootstrap.
   - Integrate AJAX for real-time data fetching.
   - Create forms for trivia answers, deposits, withdrawals, and job applications.

4. **Testing:**
   - Test APIs with Postman.
   - Test frontend interactions with dummy data.

---

