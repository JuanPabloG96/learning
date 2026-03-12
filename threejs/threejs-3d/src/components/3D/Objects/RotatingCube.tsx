import * as THREE from 'three'
import { useRef } from 'react'
import { useFrame } from '@react-three/fiber'

export function RotatingCube({ color }: { color: string }) {
  const meshRef = useRef<THREE.Mesh>(null!)

  useFrame((_state, delta) => {
    meshRef.current.rotation.y += delta
    meshRef.current.rotation.x += delta
  })

  return (
    <mesh ref={meshRef} scale={[1, 1, 1]}>
      <boxGeometry />
      <meshStandardMaterial color={color} />
    </mesh>
  )
}
