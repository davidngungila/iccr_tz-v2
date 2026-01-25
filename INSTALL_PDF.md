# PDF Generation Setup

To enable proper PDF generation for tickets and registration documents, you need to install DomPDF.

## Installation

Run the following command in your project root:

```bash
composer require dompdf/dompdf
```

## After Installation

1. Clear config cache:
```bash
php artisan config:clear
```

2. Clear all caches:
```bash
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

## How It Works

- **With DomPDF installed**: Tickets and PDFs will be generated as actual PDF files
- **Without DomPDF**: The system will fallback to HTML that can be printed to PDF by the browser

## Testing

After installation, test the PDF generation:
- Go to `/admin/events/{event}/registrations`
- Click "Ticket" or "PDF" button for any registration
- The PDF should download automatically


