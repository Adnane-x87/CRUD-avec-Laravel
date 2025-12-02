
# 🛡️ Security and Authorization Plan (V6)

This document outlines the security strategy for the Laravel Blog project. It defines the zones, roles, and authorization rules ("who can do what") before technical implementation.

## 1️⃣ Main Areas of the Blog (Zones)
List of public and protected areas in the application.

| Area / Page | URL (Example) | Access Type |
| :--- | :--- | :--- |
| **Blog Homepage** | `/` | 🟢 **Public** (Everyone) |
| **List of Articles** | `/articles` | 🟢 **Public** (Everyone) |
| **Single Article Page** | `/articles/{slug}` | 🟢 **Public** (Everyone) |
| **Admin Dashboard** | `/admin` | 🔒 **Protected** (Logged-in users only) |
| **Create Article Form** | `/admin/articles/create` | 🔒 **Protected** (Authors only) |
| **Edit Article Form** | `/admin/articles/{id}/edit` | 🔒 **Protected** (Owner of the article) |
| **Delete Action** | `/admin/articles/{id}/delete` | 🔒 **Protected** (Owner or Admin) |

---

## 2️⃣ User Roles
Definition of the actors interacting with the system.

| Role | Description |
| :--- | :--- |
| **Visitor** | A non-authenticated user. Can only view public content. |
| **Author** | A logged-in user who creates content. Can manage their *own* articles. |
| **Admin** | A logged-in user responsible for moderation. Can delete *any* article but (per rules) does not write articles. |

---

## 3️⃣ Authorization Matrix ("Who has the right to do what?")
This table defines the permissions for each role.

| Action / Role | 👤 Visitor | ✍️ Author | 🛡️ Admin |
| :--- | :---: | :---: | :---: |
| **Read Public Articles** | ✔️ | ✔️ | ✔️ |
| **Login / Logout** | ✔️ | ✔️ | ✔️ |
| **Access Dashboard (`/admin`)** | ❌ | ✔️ | ✔️ |
| **Create a new Article** | ❌ | ✔️ | ❌ |
| **Edit *Own* Article** | ❌ | ✔️ | ❌ |
| **Delete *Own* Article** | ❌ | ✔️ | ✔️ |
| **Delete *Any* Article** | ❌ | ❌ | ✔️ |

*(Note: In this specific V6 configuration, Admins focus on moderation/deletion rather than creation).*

---

## 4️⃣ Technical Implementation Strategy (Laravel Tools)
Mapping business rules to Laravel features for the upcoming tutorials.

*   **Authentication (Who is logged in?):**
    *   We will use **Laravel UI** to handle Login, Registration, and Password Reset.
    *   This answers the question: *"Is the user connected?"*

*   **Route Protection (Access to `/admin`):**
    *   We will use **Middleware (`auth`)** to block non-connected users (Visitors) from accessing the dashboard.

*   **Role Identification:**
    *   We will distinguish Admins from Authors using a database column (e.g., `is_admin`) or a specific Role check on `Auth::user()`.

*   **Fine-grained Permissions (Delete/Edit rules):**
    *   To ensure an Author can only delete *their own* article, while an Admin can delete *anything*, we will use **Laravel Gates** and **Policies**.
    *   This handles the logic: *"User X wants to delete Article Y. Are they allowed?"*