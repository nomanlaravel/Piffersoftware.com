
<script>
    // Reusable function to export table to PDF, CSV, and Excel
    function exportTable(tableId, fileType) {
        const table = document.getElementById(tableId);
        if (!table) {
            console.error(`Table with ID ${tableId} not found`);
            return;
        }

        const rows = Array.from(table.querySelectorAll('tr'));
        const data = rows.map(row => {
            return Array.from(row.querySelectorAll('th, td')).map(cell => cell.textContent.trim());
        });

        switch (fileType.toLowerCase()) {
            case 'pdf':
                exportToPdf(tableId);
                break;
            case 'csv':
                exportToCsv(data);
                break;
            case 'excel':
                exportToExcel(data);
                break;
            default:
                console.error('Unsupported file type');
        }
    }

    // Export to PDF using jsPDF
    function exportToPdf(tableId) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF({
            orientation: 'landscape',
            unit: 'mm',
            format: [1000, 600] // Further increased to ensure all data fits
        });
        const table = document.getElementById(tableId);
        if (!table) {
            console.error(`Table with ID ${tableId} not found`);
            return;
        }

        // Extract header structure with weapon types and column alignment
        const headerRows = Array.from(table.querySelectorAll('thead tr'));
        const weaponTypes = Array.from(headerRows[0].querySelectorAll('th'))
            .filter(th => th.getAttribute('colspan'))
            .map(th => ({
                text: th.textContent.trim(),
                colspan: parseInt(th.getAttribute('colspan'))
            }));
        const columnHeaders = Array.from(headerRows[1].querySelectorAll('th'))
            .map(th => th.textContent.trim());

        // Validate header and column count
        console.log('Weapon Types:', weaponTypes);
        console.log('Column Headers:', columnHeaders);
        const totalColumns = columnHeaders.length;
        if (totalColumns !== 30) {
            console.error(`Expected 30 columns, found ${totalColumns}`);
        }

        // Map weapon types to their column ranges
        let colIndex = 0;
        const weaponRanges = weaponTypes.map(wt => {
            const start = colIndex;
            colIndex += wt.colspan;
            return { text: wt.text, start, end: colIndex - 1 };
        });

        // Extract all rows, including the total row
        const rows = Array.from(table.querySelectorAll('tbody tr')).map(tr => 
            Array.from(tr.querySelectorAll('td')).map(td => td.textContent.trim())
        );
        const totalRow = table.querySelector('tbody tr:last-child td.text-center');
        if (totalRow && totalRow.textContent.includes('Total of Branch')) {
            const totalData = Array.from(table.querySelectorAll('tbody tr:last-child td'))
                .map(td => td.textContent.trim());
            rows.push(totalData);
        }
        console.log('Total Rows:', rows.length);

        // Calculate column widths to fit all data
        const columnWidths = new Array(totalColumns).fill(0).map((_, index) => {
            const maxLength = Math.max(
                columnHeaders[index].length,
                ...rows.map(row => row[index] ? row[index].length : 0)
            );
            return Math.min(maxLength * 10.0, 20); // Increased cap to 20mm
        });

        // Scale widths to fit page
        const totalWidth = columnWidths.reduce((sum, width) => sum + width, 0);
        if (totalWidth > 1000) {
            const scaleFactor = 1000 / totalWidth;
            columnWidths.forEach((width, index) => {
                columnWidths[index] = width * scaleFactor;
            });
        }

        let currentY = 10;

        // Add title
        doc.setFontSize(18);
        doc.text('Weekly Weapon Record', 5, currentY);
        currentY += 15;

        // Add weapon type headers above their columns
        weaponRanges.forEach(wt => {
            const x = 5 + columnWidths.slice(0, wt.start).reduce((sum, w) => sum + w, 0);
            doc.setFontSize(10);
            doc.text(wt.text, x, currentY, { angle: 0, align: 'left' });
        });
        currentY += 10;

        // Add column headers
        doc.autoTable({
            head: [columnHeaders],
            body: [],
            startY: currentY,
            theme: 'grid',
            margin: { top: 0, right: 0, bottom: 0, left: 0 }, // No margins for full screen
            styles: {
                fontSize: 7,
                cellPadding: 1,
                overflow: 'linebreak', // Changed to linebreak for better text handling
                halign: 'center'
            },
            headStyles: {
                fillColor: [200, 200, 200],
                textColor: [0, 0, 0],
                fontStyle: 'bold'
            },
            columnStyles: columnWidths.reduce((styles, width, index) => {
                styles[index] = { cellWidth: width };
                return styles;
            }, {})
        });
        currentY = doc.lastAutoTable.finalY + 5;

        // Paginate the data rows
        const rowsPerPage = 25;
        for (let i = 0; i < rows.length; i += rowsPerPage) {
            const pageRows = rows.slice(i, i + rowsPerPage);

            if (i > 0) {
                doc.addPage();
                currentY = 10;
                doc.text('Weekly Weapon Record', 5, currentY);
                currentY += 15;
                weaponRanges.forEach(wt => {
                    const x = 5 + columnWidths.slice(0, wt.start).reduce((sum, w) => sum + w, 0);
                    doc.setFontSize(10);
                    doc.text(wt.text, x, currentY, { angle: 0, align: 'left' });
                });
                currentY += 10;
                doc.autoTable({
                    head: [columnHeaders],
                    body: [],
                    startY: currentY,
                    theme: 'grid',
                    margin: { top: 0, right: 0, bottom: 0, left: 0 },
                    styles: { fontSize: 7, cellPadding: 1, overflow: 'linebreak', halign: 'center' },
                    headStyles: { fillColor: [200, 200, 200], textColor: [0, 0, 0], fontStyle: 'bold' },
                    columnStyles: columnWidths.reduce((styles, width, index) => {
                        styles[index] = { cellWidth: width };
                        return styles;
                    }, {})
                });
                currentY = doc.lastAutoTable.finalY + 5;
            }

            doc.autoTable({
                body: pageRows,
                startY: currentY,
                theme: 'grid',
                margin: { top: 0, right: 0, bottom: 0, left: 0 },
                styles: { fontSize: 7, cellPadding: 1, overflow: 'linebreak', halign: 'center' },
                columnStyles: columnWidths.reduce((styles, width, index) => {
                    styles[index] = { cellWidth: width };
                    return styles;
                }, {})
            });
            currentY = doc.lastAutoTable.finalY + 5;
        }

        doc.save(`weekly_weapon_record_${new Date().toISOString().slice(0, 19).replace(/:/g, '-')}.pdf`);
    }

    // Export to CSV using Papa Parse
    function exportToCsv(data) {
        const csv = Papa.unparse(data);
        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', `weekly_weapon_record_${new Date().toISOString().slice(0, 19).replace(/:/g, '-')}.csv`);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Export to Excel using SheetJS
    function exportToExcel(data) {
        const ws = XLSX.utils.aoa_to_sheet(data);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Weekly Weapon Record');
        XLSX.writeFile(wb, `weekly_weapon_record_${new Date().toISOString().slice(0, 19).replace(/:/g, '-')}.xlsx`);
    }

    // Add event listeners for export buttons
    document.addEventListener('DOMContentLoaded', () => {
        const exportButtons = document.querySelectorAll('[data-export]');
        exportButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tableId = button.getAttribute('data-table');
                const fileType = button.getAttribute('data-export');
                exportTable(tableId, fileType);
            });
        });
    });
</script>