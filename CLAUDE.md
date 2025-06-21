# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

### Server Management
- `composer run dev` - Start development environment (server, queue, logs, and Vite)
- `php artisan serve` - Start Laravel development server only
- `npm run dev` - Start Vite development server for assets
- `npm run build` - Build production assets

### Testing
- `composer run test` - Run full test suite (clears config and runs tests)
- `php artisan test` - Run tests directly

### Code Quality
- `php artisan pint` - Format code using Laravel Pint
- `php artisan config:clear` - Clear configuration cache

### Database Management
- `php artisan migrate` - Run database migrations
- `php artisan migrate:fresh --seed` - Fresh migration with seeders
- `php artisan db:seed` - Run database seeders

### Queue Management
- `php artisan queue:listen --tries=1` - Start queue worker
- `php artisan pail --timeout=0` - Real-time log monitoring

## Architecture Overview

### Framework Stack
- **Laravel 12** with **Livewire 3** and **Volt** for reactive components
- **Flux UI** component library for consistent design system
- **Spatie Laravel Permission** for role-based access control
- **TailwindCSS 4** for styling with Vite build system

### Application Structure

#### Core Models
- `User` - Authentication with role-based permissions using HasRoles trait
- `DepartemenBiro` - Main organizational entities with three divisions (Internal, PSTI, Eksternal)
- `Fungsi`, `ProgramKerja`, `Agenda`, `Anggota` - Related entities tied to departments
- `CommunityCommittee` - Community and committee management
- `TentangKami`, `AdArt`, `Inti` - Content management models

#### Livewire Components
- **Admin Components**: `ManageUsers`, `ManageRoles` (protected by permissions)
- **Content Management**: `ManageDepartemenBiro`, `ManageCommunityCommittee`, `ManageTentangKami`, `ManageADART`, `ManageInti`
- **Auth Components**: Login, registration, password management using Volt
- Components use file uploads via `WithFileUploads` trait and pagination via `WithPagination`

#### Route Structure
- **Public Routes**: Home, profile pages, departemen-biro display, community-committee display
- **Protected Dashboard**: Requires `auth` middleware and `can:access dashboard` permission
- **Admin Routes**: Additional permission checks (`can:manage users`, `can:manage roles`)
- **Settings Routes**: User profile, password, and appearance management

#### File Management
- Uses Laravel's `Storage` facade with `public` disk
- File uploads stored in organized directories: `departemen-logos/`, `anggota-fotos/`, `ad_art/`, etc.
- Automatic cleanup of old files when entities are updated or deleted

#### Permission System
- Role-based access control using Spatie package
- Key permissions: `access dashboard`, `manage users`, `manage roles`
- Middleware protection on sensitive routes and admin functionality

### Development Patterns
- **Livewire Form Handling**: Comprehensive validation rules, separate methods for create/edit operations
- **Modal Management**: Centralized modal system with type-based rendering
- **File Upload Patterns**: Consistent upload, validation, and cleanup across components
- **Search & Filtering**: Query string persistence for user experience
- **Flash Messages**: Session-based success/error messaging

### Database Structure
- Uses Laravel migrations with foreign key relationships
- Seeders for initial data: users with roles, departments, and content
- Models use appropriate relationships (hasMany, belongsTo) for data integrity