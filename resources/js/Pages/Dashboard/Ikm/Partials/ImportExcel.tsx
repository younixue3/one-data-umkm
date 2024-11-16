import { useState } from 'react';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger
} from '@/Components/ui/dialog';
import { router } from '@inertiajs/react';
import { toast } from '@/hooks/use-toast';
import { Download, Upload } from 'lucide-react';
import Errors from '@/helper/Errors';

export default function ImportExcel() {
  const [open, setOpen] = useState(false);
  const [file, setFile] = useState<File | null>(null);

  const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const selectedFile = e.target.files?.[0];
    if (selectedFile) {
      if (selectedFile.size > 5000000) {
        // 5MB limit
        toast({
          variant: 'destructive',
          title: 'Error',
          description: 'Ukuran file terlalu besar. Maksimal 5MB'
        });
        return;
      }

      const allowedTypes = [
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.ms-excel'
      ];
      if (!allowedTypes.includes(selectedFile.type)) {
        toast({
          variant: 'destructive',
          title: 'Error',
          description:
            'Format file tidak sesuai. Gunakan format .xlsx atau .xls'
        });
        return;
      }

      setFile(selectedFile);
    }
  };

  const handleSubmit = () => {
    if (!file) {
      toast({
        variant: 'destructive',
        title: 'Error',
        description: 'Pilih file terlebih dahulu'
      });
      return;
    }

    const formData = new FormData();
    formData.append('file', file);

    router.post(route('dashboard.ikm.import'), formData, {
      onSuccess: () => {
        setOpen(false);
        setFile(null);
        toast({
          title: 'Berhasil',
          description: 'Data berhasil diimport'
        });
      },
      onError: err => {
        toast({
          variant: 'destructive',
          title: 'Gagal',
          description: Errors(err)
        });
      }
    });
  };

  return (
    <Dialog open={open} onOpenChange={setOpen}>
      <DialogTrigger asChild>
        <Button variant="outline">
          <Upload className="w-4 h-4 mr-2" />
          Import Excel
        </Button>
      </DialogTrigger>
      <DialogContent>
        <DialogHeader>
          <DialogTitle>Import Data IKM</DialogTitle>
          <DialogDescription>
            Upload file excel untuk import data IKM secara massal. Gunakan
            template yang tersedia untuk menghindari kesalahan format.
          </DialogDescription>
        </DialogHeader>

        <div className="space-y-4">
          <Input type="file" accept=".xlsx,.xls" onChange={handleFileChange} />

          {file && (
            <p className="text-sm text-muted-foreground">
              File terpilih: {file.name}
            </p>
          )}
        </div>

        <DialogFooter>
          <Button variant="outline" onClick={() => setOpen(false)}>
            Batal
          </Button>
          <Button onClick={handleSubmit}>Import</Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  );
}
