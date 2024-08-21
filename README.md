# Motorpool and Agricultural Supplies Inventory Management System for MAFAR

## Overview

The **Motorpool and Agricultural Supplies Inventory Management System** is a comprehensive web-based application designed to manage and track the distribution of agricultural supplies within the BARMM region. The system supports multiple user roles, including System Admin, Regional User, Province User, and Municipal User, each with distinct functionalities to streamline inventory management and ensure accurate distribution.

## Features

- **Role-Based Access Control**: Different functionalities and views based on user roles:
  - **System Admin**: Full access to settings, user management, and inventory.
  - **Regional User**: Manage regional inventory, initiate distributions to provinces and municipalities.
  - **Province User**: Manage provincial inventory, initiate distributions to municipalities.
  - **Municipal User**: Manage municipal inventory and confirm receipt of items.
  
- **Inventory Management**: Categorize and manage agricultural supplies, including seeds, pesticides, fertilizers, and more.

- **Distribution Management**: Track and manage distribution of supplies from regional to municipal levels.

- **Received Confirmation**: Allows municipal users to confirm the receipt of distributed items.

- **Motorpool Status**: Manage the status and details of motorpool vehicles involved in distributions.

- **Reports Generation**: Generate detailed reports on inventory and distribution activities.

- **User Management**: Only accessible to System Admins for creating and managing user accounts.

## Technologies Used

- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/nurhaminator/MAFARIMS.git
