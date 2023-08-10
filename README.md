<h1 align="center">SIMAK</h1>


## 🚀 Installation

Follow these steps to install and run the SIMAK project:

### 1. Clone this repository to your computer:

```
git clone https://github.com/username/SistemManajemenKuesioner.git
```



### 2. Navigate to the project directory:

```
cd SistemManajemenKuesioner
```


### 3. Install JavaScript dependencies using npm (Node.js must be installed):

```
npm install
```

### 4. Copy the .env.example file to .env and configure the database and other settings:

```
cp .env.example .env
```

### 5. Run database migrations and seed initial data:

```
php artisan migrate --seed
```

### 6. Generate the application key:

```
php artisan key:generate
```

### 7. Run the development server

```
npm run dev && php artisan serve
```
