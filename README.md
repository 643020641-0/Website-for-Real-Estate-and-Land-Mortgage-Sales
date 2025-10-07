# 🏡 Website-for-Real-Estate-and-Land-Mortgage-Sales

[cite_start]เว็บไซต์สำหรับซื้อขายอสังหาริมทรัพย์ ที่ดิน และสินเชื่อที่ดิน (LandScout) ถูกออกแบบมาเพื่ออำนวยความสะดวกในการค้นหาและซื้อขายทรัพย์สิน พร้อมระบบบริหารจัดการข้อมูลเบื้องหลัง (Backend) [cite: 173, 177, 179]

---

## 🛠️ การตั้งค่าและติดตั้ง (Setup and Installation)

[cite_start]โปรเจกต์นี้จำเป็นต้องมี Web Server จำลองเพื่อประมวลผลโค้ด **PHP** และจัดการฐานข้อมูล **MySQL** แนะนำให้ใช้ **XAMPP** ซึ่งเป็นชุดซอฟต์แวร์ที่รวม Apache, MariaDB (MySQL), PHP, และ Perl ไว้ด้วยกัน [cite: 11]

### ข้อกำหนดเบื้องต้น (Prerequisites)

* [cite_start]**XAMPP** (สำหรับ Windows, Linux, หรือ macOS) [cite: 19, 20, 22]
* โปรแกรมแก้ไขข้อความ (เช่น VS Code)

### ขั้นตอนการติดตั้ง

#### 1. ติดตั้ง XAMPP

1.  [cite_start]ดาวน์โหลดโปรแกรม XAMPP จากเว็บไซต์ **Apache Friends** [cite: 1, 4, 7]
2.  [cite_start]ทำการติดตั้งโปรแกรม โดยเลือก **Components** ที่จำเป็นได้แก่ **Apache** และ **MySQL** [cite: 35, 44, 47]
3.  [cite_start]เลือก Path ในการติดตั้ง เช่น **`C:\xampp`** [cite: 68]
4.  ดำเนินการติดตั้งจนเสร็จสิ้น

#### 2. นำไฟล์โค้ดเข้าสู่ Web Server

[cite_start]หลังจากติดตั้ง XAMPP แล้ว คุณต้องคัดลอกไฟล์โปรเจกต์ทั้งหมดมาไว้ในไดเรกทอรีสำหรับ Public Web (Web Root) [cite: 166, 167]

1.  คัดลอกโฟลเดอร์โปรเจกต์นี้ (เช่น โฟลเดอร์ `LandScouts`)
2.  [cite_start]นำโฟลเดอร์ที่คัดลอกมาวางไว้ที่: **`C:\xampp\htdocs\`** [cite: 168]

#### 3. การเริ่มต้นใช้งาน (Running the Application)

1.  เปิด **XAMPP Control Panel**
2.  [cite_start]คลิก **Start** ที่ Module **Apache** [cite: 126, 131]
3.  [cite_start]คลิก **Start** ที่ Module **MySQL** [cite: 127, 135]
4.  [cite_start]เปิดเว็บเบราว์เซอร์และเข้าถึงเว็บไซต์ผ่าน URL: **`http://localhost/LandScouts/`** [cite: 172]
    * *หมายเหตุ: หากคุณเปลี่ยนชื่อโฟลเดอร์ ให้เปลี่ยน `LandScouts` ใน URL เป็นชื่อโฟลเดอร์ใหม่*

---

## 🔑 เทคโนโลยีที่ใช้ (Technologies Used)

* [cite_start]**Server Environment:** XAMPP (Apache + MariaDB + PHP + Perl) [cite: 11]
* [cite_start]**Database:** MariaDB (MySQL) [cite: 11]
* [cite_start]**Server-side Scripting:** PHP [cite: 11]
* *(เพิ่มรายการเทคโนโลยีอื่น ๆ ที่คุณใช้ เช่น HTML, CSS, JavaScript Frameworks)*

---

## 🤝 ผู้พัฒนา (Developer)

* [643020641-0 วรภพ แก้วโพนเพ็ก]

---

## 📜 License

โปรเจกต์นี้อยู่ภายใต้วิชา [SC313002	PRINCIPLES OF SOFTWARE DESIGN AND DEVELOPMENT (GD)] 
