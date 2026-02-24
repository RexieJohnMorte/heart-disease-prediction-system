# Heart Disease Prediction System

A full-stack machine learning web application that predicts the likelihood of heart disease based on patient medical data.

This project demonstrates end-to-end integration of a trained Random Forest classification model with a PHP and MySQL web application, simulating a real-world medical risk assessment system.

---

## Project Overview

The system allows users to input medical attributes such as age, blood pressure, cholesterol levels, and other health indicators.  
The backend processes this data using a trained machine learning model and returns a prediction result.

This project showcases:

- Machine Learning model training and deployment
- Backend-to-Python integration
- Database-driven web applications
- Full-stack development skills
- Real-world ML system architecture

---

## Features

- Web-based patient data input form
- Random Forest classification model
- Real-time heart disease prediction
- MySQL database storage
- PHP backend integration with Python
- Clean and simple user interface
- Modular project structure

---

## Tech Stack

### Frontend
- HTML
- CSS

### Backend
- PHP
- MySQL

### Machine Learning
- Python
- Pandas
- Scikit-learn (RandomForestClassifier)

### Development Environment
- XAMPP (Apache & MySQL)
- Python Virtual Environment (venv)

---

## Machine Learning Details

- Algorithm: Random Forest Classifier
- Dataset: Heart Disease Prediction Dataset (CSV)
- Target Variable:
  - 1 → Presence of Heart Disease
  - 0 → Absence of Heart Disease
- Train/Test Split: 80% Training / 20% Testing

The model is trained using `train_model.py` and saved as `model.pkl` (excluded from GitHub for best practice).

---

## Project Structure
heart-disease/
│
├── model/
│ ├── train_model.py
│
├── dbconnect.php
├── index.php
├── predict.php
├── .gitignore
└── README.md


---

## Installation & Setup

### 1. Clone the Repository
git clone https://github.com/YOUR_USERNAME/heart-disease-prediction-system.git

---

### 2. Set Up Python Environment
python -m venv venv
venv\Scripts\activate


Install dependencies: pip install pandas scikit-learn

---

### 3. Train the Model
cd model
python train_model.py


This will generate: model.pkl

---

### 4. Start the Web Application

1. Start XAMPP (Apache + MySQL)
2. Place the project folder inside: htdocs/
3. Import the database into MySQL
4. Open browser: http://localhost/heart-disease


---

## What This Project Demonstrates

- Practical machine learning implementation
- Integration of ML with traditional web technologies
- Backend execution of Python from PHP
- Structured project organization
- Clean deployment workflow

---

## Future Improvements

- Add model accuracy and evaluation metrics
- Deploy using Flask or FastAPI
- Cloud deployment (AWS / Render / Railway)
- Add authentication system
- Improve UI/UX design

---

## Author

**Rexie John Morte**


---


